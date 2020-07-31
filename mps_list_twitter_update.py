from mps_list import *

from mps_list_twitter import *

print(len(mps_list))

for i in range(0,len(mps_list)):

    #print(mps_list[i])
    #print(mps_list_twitter[i])

    from config import *

    mycursor = conn.cursor()

    mycursor.execute ("""
       UPDATE all_mps
       SET twitter_handle = %s
       WHERE name = %s
    """, (mps_list_twitter[i], mps_list[i]))

    conn.commit()

conn.close()

print("Your values were updated.")
