#--------Maneja la creación de la base de datos y proporciona una sesión

from sqlalchemy.orm import sessionmaker
from config_db import engine
from models import Base


def resetear_db():
    Base.metadata.drop_all(engine)


def init_db():
    Base.metadata.create_all(engine)

def get_session():
    Session = sessionmaker(bind=engine)
    return Session()