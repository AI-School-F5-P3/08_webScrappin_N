#Este el archivo princiapal

import logging #para línea 11


from scraper import get_soup, listing_phrases,listing_authors,listing_links
from data_saving import create_df, create_csv
from config import url_web,path
from database import init_db, resetear_db
from data_processor import process_and_save_data

""" 
logging.basicConfig(level=logging.DEBUG,
                    format='%(asctime)s - %(threadName)s - %(processName)s -%(levelName)s -%(message)s',
                    filename='WebScrap.log',
                    filemode='a') """



def ejecuta_main():
    soup=get_soup(url_web)
    resul_phrases=listing_phrases(soup)
    resul_authors=listing_authors(soup)
    resul_links=listing_links(soup)

    
    resul_df=create_df(resul_phrases, resul_authors,resul_links)
    res_csv=create_csv(resul_df)
    
    resetear_db()
    init_db()
    process_and_save_data(resul_phrases, resul_authors, resul_links)
    return print(f'\nEl dataframe es:\n\n{resul_df.to_string(index=False,justify='left', header=True, max_colwidth=50,col_space=20)}')

    #resul_promp=resul_df.to_string(index=False,justify='left', header=True, max_colwidth=50,col_space=20)
    
    #print(resul_promp)
if __name__ == "__main__":
    
    ejecuta_main()
