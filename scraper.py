#-----------Aquí construyo las funciones relacionadas con web scrapping

#Módulos y librerías
import requests
from bs4 import BeautifulSoup


#Módulos "creados"
from config import url_web
from logs import logger

def get_soup(url_web):
    response = requests.get(url_web)
    return BeautifulSoup(response.text, 'html.parser')




#--------Función que crea una lista con las frases---------


def listing_phrases(soup): 
    try:
        logger.debug('Se ejecuta la función listing_phrases')
        list_phrases=[] 
        phrases=soup.find_all('span',class_="text") 
        for i in phrases: 
            list_phrases.append(i.text.strip('“”')) 
        return list_phrases
    
    except AttributeError:
        print('No se encontraron elementos con la clase "text"')
        logger.debug('No se encontraron elementos con la clase "text"')
        return []
    
    except Exception as e:
        print(f"Error: {e}")
        return []





 

#---------Función que crea una lista con los autores-------
def listing_authors(soup): 
    try:
        logger.debug('Se ejecuta la función listing_authors')
        authors=soup.find_all('small',class_="author") 
        list_authors=[] 
        for i in authors: 
            list_authors.append(i.text) 
        return list_authors
    except AttributeError:
        print('No se encontraron elementos con la clase "author"')
        logger.debug('No se encontraron elementos con la clase "author"')
        return []
        
    except Exception as e:
        print(f"Error: {e}")
        return []



#---------Función que crea una lista con los links-------
def listing_links(soup): 
    
    try:
        logger.debug('Se ejecuta la función listing_links')

        links=[a['href'] for a in soup.find_all('a', string=lambda t: t and '(about)' in t)] 
        list_links=[] 
        for i in links: 
            list_links.append(url_web+i) 
            
        return list_links
    except AttributeError:
        print('No se encontraron elementos con la "href"')
        logger.debug('No se encontraron elementos con la "href"')
        return []

    except Exception as e:
        print(f"Error: {e}")
        return []



