
#pip install sqlalchemy_utils

from sqlalchemy import create_engine, MetaData
from sqlalchemy_utils import database_exists, create_database

# Configura la conexión a la base de datos
username = 'root'
password = ''
host = 'localhost'
port = 3306
database = 'Web_database'


engine = create_engine(f'mysql+pymysql://{username}:{password}@{host}:{port}/{database}')

# Verifica si la base de datos existe, si no, la crea
if not database_exists(engine.url):
    create_database(engine.url)

metadata = MetaData()

# Ahora puedes crear las tablas
metadata.create_all(engine)