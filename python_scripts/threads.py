#./426DatabaseInsert.py

import re
import time
import random
import multiprocessing
import os
import sqlite3
import mysql.connector
import ctypes


def implement(lock,index,arr,gID,size):
    mSQL1 = mysql.connector.connect(host = "bathmap-db-1.cneazldeoyra.us-east-1.rds.amazonaws.com",username = "admin",password = "towMater",database = "bathmap_mysql_1")
    SQLCursor1 = mSQL1.cursor()
    while(index.value < 10000 and index.value >= 0):
        lock.acquire()
        try:
            #z, row, column, gID, tileID
            data = (arr[index.value][0],arr[index.value][2],arr[index.value][1],gID,arr[index.value][3])
            SQLCursor1.execute("insert into location values (%s,%s,%s,%s,%s)",data)
            #mSQL1.commit()
            #print(arr[index.value][0],arr[index.value][2],arr[index.value][1],gID,arr[index.value][3])
            index.value = index.value + 1
            print("tiles remaining: ", 10000-index.value)
        finally:
            lock.release()

       
if __name__ == "__main__":
    mSQL = mysql.connector.connect(host = "bathmap-db-1.cneazldeoyra.us-east-1.rds.amazonaws.com",username = "admin",password = "towMater",database = "bathmap_mysql_1")
    SQLCursor = mSQL.cursor()
    #SQLCursor.execute("delete FROM bathmap_mysql_1.location where gridID = '15'")
    #mSQL.commit()
    
    inp = input("Input which grid to translate: ")
    n = 0
    gridID = 0
    flooms = './mbtiles/ncds_01a.MBTILES'
    index = flooms.index("0")  # find the index of "o" in "hello"
    dest = " "
    match = re.search(r'\d+', inp)
    if match:
        n = match.group(0)
    n = int(n)
    florms = " "
    if n < 10:
        florms = "0" + inp
    else:
        florms = inp
    dest = flooms[:index] + florms + flooms[index+3:]
    conn = sqlite3.connect(dest)
    cursor = conn.cursor()
    cursor.execute("select * from map")
    row = cursor.fetchall()
    cursor.execute("select count(*) from map")
    row2 = cursor.fetchall()

    lock = multiprocessing.Lock()    
    
    proc = []
    index = 0
    ind = multiprocessing.Value('i',index)
    ti1 = time.time()
    for i in range(0,12):
        t1 = multiprocessing.Process(target=implement, args=(lock,ind,row,inp,row2[0][0]))
        t1.start()
        proc.append(t1)

    for pr in proc:
        pr.join()
    ti2 = time.time()
    
    print(ti2-ti1)
    
        
