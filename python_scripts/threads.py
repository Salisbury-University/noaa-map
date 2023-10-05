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

indexGL = 0
indexGL2 = 0

def implement(lock,arr,size):
    mSQL2 = mysql.connector.connect(host = "bathmap-db-1.cneazldeoyra.us-east-1.rds.amazonaws.com",username = "admin",password = "towMater",database = "bathmap_mysql_1", connect_timeout=6000)
    SQLCursor2 = mSQL2.cursor()
    global indexGL
    while(indexGL < size):
        lock.acquire()
        try:
            if indexGL == size:
                break
            #z, row, column, gID, tileID
            SQLCursor2.executemany("insert into tile values (%s,%s,%s);",arr[indexGL])
            mSQL2.commit()
            indexGL = indexGL + 1
            print("tile chunks remaining: ", size-indexGL)
        finally:
            lock.release()

def implement2(lock,arr,size):
    mSQL3 = mysql.connector.connect(host = "bathmap-db-1.cneazldeoyra.us-east-1.rds.amazonaws.com",username = "admin",password = "towMater",database = "bathmap_mysql_1", connect_timeout=6000)
    SQLCursor3 = mSQL3.cursor()
    global indexGL2
    while(indexGL2 < size):
        lock.acquire()
        try:
            if indexGL2 == size:
                break
            #z, row, column, gID, tileID
            SQLCursor3.executemany("insert into location values (%s,%s,%s,%s,%s);",arr[indexGL2])
            mSQL3.commit()
            indexGL2 = indexGL2 + 1
            print("location chunks remaining: ", size-indexGL2)
        finally:
            lock.release()


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
    """
    florb = [inp]
    print("Clearing previous data from grid ",inp)
    SQLCursor.execute('Delete from location where gridID = %s',florb)
    mSQL.commit()
    SQLCursor.execute('Delete from tile where gridID = %s',florb)
    mSQL.commit()
    SQLCursor.execute('Delete from grid where gridID = %s',florb)
    mSQL.commit()
    print("Previous data cleared. Beginning migration.")
    """

    lock1 = threading.Lock()
    cursor.execute("select * from map")
    row = cursor.fetchall()
    cursor.execute("select count(*) from map")
    row2 = cursor.fetchall()
    
    ti1 = time.time()
    fleems = []
    index = 0
    for x in row:
        data = (x[0],x[1],x[2],x[3],inp)
        fleems.append(data)
        print("Remaining rows: ",row2[0][0] - index)
        index = index + 1
    
    fleems4 = []
    f = 0
    data3 = []
    print("splitting location database ")
    for l in range(0,len(fleems)):
        data3.append(fleems[l])
        if l % 100000 == 0 and l != 0:
            fleems4.append(data3)
            print(len(data3))
            data3 = []
        if l == len(fleems)-1:
            print(len(data3))
            fleems4.append(data3)
    print("location database split")
    lock = multiprocessing.Lock() 
    proc = []
    index = 0   
    lock3 = threading.Lock()

    ind = 1
    for i in range(0,6):
        t1 = threading.Thread(target=implement2, args=(lock3,fleems4,len(fleems4)))
        t1.start()
        proc.append(t1)

    for pr in proc:
        pr.join()

    print("Location migration finished")
    
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
    print("splitting image table")
    for l in range(0,len(fleems2)):
        data2.append(fleems2[l])
        if l % 3500 == 0 and l != 0:
            fleems3.append(data2)
            print(len(data2))
            data2 = []
        if l == len(fleems2)-1:
            print(len(data2))
            fleems3.append(data2)
    print("image table split")
    lock = multiprocessing.Lock() 
    proc = []
    index = 0   
    lock2 = threading.Lock()

    ind = 1
    for i in range(0,6):
        t1 = threading.Thread(target=implement, args=(lock2,fleems3,len(fleems3)))
        t1.start()
        proc.append(t1)

    for pr in proc:
        pr.join()
    
    print("image migration finished")
    
    cursor.execute('select value from metadata where name = "bounds" or name = "center"')
    rows4 = cursor.fetchall()
    data5 = (inp, rows4[0][0], rows4[1][0])
    SQLCursor.execute('insert into grid values (%s, %s, %s)',data5)
    mSQL.commit()
    ti2 = time.time()
    print(ti2-ti1)
    
    print("migration complete")        
    