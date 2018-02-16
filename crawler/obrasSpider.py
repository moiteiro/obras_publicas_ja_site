import scrapy

import mysql.connector
from datetime import date, datetime, timedelta

class ObrasPublicas(scrapy.Spider):
	name = "obrasPublicas"
	start_urls = ['https://transparencia.es.gov.br/Obras/ObrasDetalhe?id=2363']

	def parse(self, response):

		nome = self.parse_entry(response, '//label[@for="InfoObra_Objeto"]/../text()')
		local = self.parse_entry(response, '//label[@for="InfoObra_Municipio"]/../text()')
		orgao = self.parse_entry(response, '//label[@for="InfoObra_Orgao"]/../text()')
		data_contrato = self.parse_entry(response, '//label[@for="InfoContrato_DtContrato"]/../text()').split('/')
		situacao = self.parse_entry(response, '//label[@for="InfoExecucao_Situacao"]/../text()')
		valor = self.parse_entry(response, '//label[@for="InfoExecucao_ValorInicial"]/../text()')
		data_inicio = self.parse_entry(response, '//label[@for="InfoExecucao_PrazoInicial"]/../text()').split()[0]
		data_aditado = self.parse_entry(response, '//label[@for="InfoExecucao_PrazoAditado"]/../text()').split()[0]
		data_total = self.parse_entry(response, '//label[@for="InfoExecucao_PrazoTotal"]/../text()').split()[0]

		situacao = self.verify_status(situacao)
		
		yield {"nome": nome, "local" : local, "orgao": orgao,
		"data_contrato": data_contrato, 'situacao': situacao,
		'data_inicio': data_inicio, 'data_aditado': data_aditado, 'data_total': data_total,
		'valor': valor }

		data = (nome, local, orgao, 8,
			date(int(data_contrato[2]), int(data_contrato[1]), int(data_contrato[0])), situacao, data_inicio, 
			data_aditado, data_total, valor)

		self.save(data)
		

	def parse_entry(self, response, path):
		return response.xpath(path).extract()[1].encode('ascii','replace').strip()

	def verify_status(self, status):
		status = status.split('(')[0].strip()

		if status == "Em execu??o":
			status = 1
		elif status == "Conclu?da":
			status = 2
		elif status == "Contrato rescindido":
			status = 4
		elif status == "Paralisada":
			status = 5

		return status

	def save(self, data):
		#database connection
		cnx = mysql.connector.connect(user='development', password='secret',
								host='127.0.0.1',
								database='obraspublicas')
		cursor = cnx.cursor()

		add_obra = ("INSERT INTO obras "
               "(nome, local, orgao, estadoId, data_contrato, situacao, data_inicio, data_aditado, data_total, valor)"
               "VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)")

		cursor.execute(add_obra, data)
		cnx.commit()
		cnx.close()