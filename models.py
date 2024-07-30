

#python.exe -m pip install --upgrade pip

from sqlalchemy import Column, Integer, String, ForeignKey
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import relationship

Base = declarative_base()



class Phrase(Base):
    __tablename__ = 'phrases'

    id = Column(Integer, primary_key=True)
    text = Column(String(500))
    author_id = Column(Integer, ForeignKey('authors.id'))

    author = relationship("Author", back_populates="phrases")


class Author(Base):
    # Definición de la clase Author

    __tablename__ = 'authors'

    id = Column(Integer, primary_key=True)
    name = Column(String(100))
    
    #Relaciones one-to-many
    phrases = relationship("Phrase", back_populates="author")
    link = relationship("Link", back_populates="author")    



class Link(Base):
    # Definición de la clase Link
    __tablename__ = 'links'

    id = Column(Integer, primary_key=True)
    url = Column(String(200))
    author_id = Column(Integer, ForeignKey('authors.id'))

    author = relationship("Author", back_populates="link")
