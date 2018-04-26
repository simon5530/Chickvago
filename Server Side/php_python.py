import sys 
import pymysql

# =============================================================================
#                           Get  input argument
# =============================================================================
account = sys.argv[1] #get value from php
passwd =  sys.argv[2]
num = sys.argv[3]
num = float(num) #change type to float
num = num+5
print(num) #pass value to php

# =============================================================================
#                          Connect to Database
# =============================================================================
#%% Database information
hostname = 'localhost'
username = 'aicourse'
password = ''
database = 'aicourse'

myConnection = pymysql.connect( host=hostname, user=username, passwd=password, db=database,autocommit=True)

#Get account password data
cur = myConnection.cursor()
#Print account and password
#for account, password in cur.fetchall() :
#   print (account, password)
#Update value      
#sql = "UPDATE users SET Number = %f WHERE account= %s",(num ,user)
cur.execute("UPDATE users SET Number = %s WHERE account= %s",(num ,account))
myConnection.close()