# тут собираем данные из бд по запросу, нормализуем их, оцениваем качество

import graphene

class Query(graphene.ObjectType):
  hello = graphene.String(name=graphene.String(default_value="World"))

  def resolve_hello(self, info, name):
    return 'Hello ' + name

schema = graphene.Schema(query=Query)
result = schema.execute('{ hello }')
print(result.data['hello']) # "Hello World"



class Dataset:
    data = []
    params = {}

    def __init__ (self, data, params):
        for i in data:
            self.data.append(data)
        
    def normalize (self):
        return True

    # анализируем БД, мб выводим графики по ней через matplotlib
    def analyze(self):
        for i in self.data:
            print(i)

    # создаем новую БД по заданным параметрам, и экспортируем ее в Datahub
    def export(self):
        return True
