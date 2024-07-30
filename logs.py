import logging

logger = logging.getLogger(__name__)

logger.setLevel(logging.DEBUG) 

handler = logging.FileHandler('mi_web.log')  
handler.setLevel(logging.DEBUG)  

formatter = logging.Formatter('%(asctime)s - %(name)s - %(levelname)s - %(message)s')
handler.setFormatter(formatter)  

logger.addHandler(handler)


