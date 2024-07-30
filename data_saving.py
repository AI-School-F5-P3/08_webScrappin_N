#----Contendría las funciones para guadar y crear df a partir de los datos

import pandas as pd
import logging

#Módulos 'creados'
from config import path
from logs import logger


#------------Creo una función que cree un dataframe con las listas-----
def create_df(list_phrases, list_authors,list_links): 
    dic_lists={'phrases':list_phrases,'author':list_authors, 'about':list_links} 
    df=pd.DataFrame(dic_lists) 
    return df



#-------------Llamo a la función que crea el dataframe y le aplico el método to_csv


def create_csv(resul_df): 
    try:
        logger.debug('Se ha generado el CSV')
        df_csv=resul_df.to_csv(path+'\\mi_df.csv',index=True,header='True', sep=';',encoding='utf-8-sig')
        return df_csv
        
    except:
        AttributeError 
        print('No se ha generado el CSV')
        logger.debug('No se ha generado el CSV')
        

#print(create_df(listing_phrases(soup), listing_authors(soup),listing_links(soup)).to_string(index=False, header=True,justify='left', max_colwidth=100,col_space=20))
