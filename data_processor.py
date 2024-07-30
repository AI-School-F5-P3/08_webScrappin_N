#Procesa los datos obtenidos y los guarda en la base de datos.

from models import Phrase, Author, Link
from database import get_session


def process_and_save_data(list_phrases, list_authors, list_links):
    session = get_session()
    

    
    for phrase, author_name, link_url in zip(list_phrases, list_authors, list_links):
        author = session.query(Author).filter_by(name=author_name).first()
        if not author:
            author = Author(name=author_name)
            session.add(author)
        
        phrase = Phrase(text=phrase, author=author)
        session.add(phrase)
        
        link = Link(url=link_url, author=author)
        session.add(link)

    session.commit()