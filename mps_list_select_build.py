from mps_list import *

mylist = []
for mp in mps_list:
    item = "<option value=\""
    item += mp
    item += "\">"
    print(item)
