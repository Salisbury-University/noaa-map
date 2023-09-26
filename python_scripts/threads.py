#./426DatabaseInsert.py

import re
import time
import random
import multiprocessing
import os
import sqlite3
import mysql.connector
import ctypes
import threading


def implement(lock,arr,size,index):
    mSQL1 = mysql.connector.connect(host = "bathmap-db-1.cneazldeoyra.us-east-1.rds.amazonaws.com",username = "admin",password = "towMater",database = "bathmap_mysql_1", connect_timeout=6000)
    SQLCursor1 = mSQL1.cursor()
    while(index.value < size):
        lock.acquire()
        try:
            if index.value == size:
                break
            #z, row, column, gID, tileID
            SQLCursor1.executemany("insert into tile values (%s,%s,%s);",arr[index.value])

            index.value = index.value + 1
            print("tile chunks remaining: ", size-index.value)
        finally:
            lock.release()

def implement2(arr):
    mSQL1 = mysql.connector.connect(host = "bathmap-db-1.cneazldeoyra.us-east-1.rds.amazonaws.com",username = "admin",password = "towMater",database = "bathmap_mysql_1", connect_timeout=6000)
    SQLCursor1 = mSQL1.cursor()
    SQLCursor1.executemany("insert into location values (%s,%s,%s,%s,%s);",arr)
    


if __name__ == "__main__":
    mSQL = mysql.connector.connect(host = "bathmap-db-1.cneazldeoyra.us-east-1.rds.amazonaws.com",username = "admin",password = "towMater",database = "bathmap_mysql_1",connect_timeout=6000)
    SQLCursor = mSQL.cursor()
    
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
    
    
    fleems = []
    index = 0
    for x in row:
        data = (x[0],x[2],x[1],x[3],inp)
        fleems.append(data)
        print("Remaining rows: ",row2[0][0] - index)
        index = index + 1
    """
    t1 = threading.Thread(target=implement2, args=(fleems,))
    t1.start()
    t1.join()

    ti1 = time.time()


    ti2 = time.time()
    print(ti2-ti1)
    print("Location migration finished")
    """

    
    fleems2 = []
    cursor.execute("select * from images")
    row3 = cursor.fetchall()
    for y in row3:
        data = (y[0],y[1],inp)
        fleems2.append(data)
    fleems3 = []
    f = 0
    data2 = []
    print(len(fleems2))
    for l in range(0,len(fleems2)):
        data2.append(fleems2[l])
        if l % 5000 == 0 and l != 0:
            fleems3.append(data2)
            print(len(data2))
            data2 = []
        if l == len(fleems2)-1:
            print(len(data2))
            fleems3.append(data2)

    lock = multiprocessing.Lock() 
    proc = []
    index = 0   
    
    ind = 0
    ti1 = time.time()
    for i in range(0,6):
        t1 = threading.Thread(target=implement, args=(fleems3,len(fleems3),ind))
        t1.start()
        proc.append(t1)

    for pr in proc:
        pr.join()
    
    print("image migration finished")
    ti2 = time.time()
    
    print(ti2-ti1)
    

    cursor.execute('select value from metadata where name = "bounds" or name = "center"')
    rows4 = cursor.fetchall()
    data5 = (inp, rows4[0][0], rows4[1][0])
    SQLCursor.execute('insert into grid values (%s, %s, %s)',data5)

    print("migration complete")        
