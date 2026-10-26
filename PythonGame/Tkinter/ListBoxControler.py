from tkinter import *
from Field import TableField
class ListBoxControler():
    @staticmethod
    def FillList(Table: TableField,list:Listbox,team):
        x=0;y=0
        list.delete(0, END)
        for row in Table.field:
            for element in row: 
                if (element!=0):
                    if(element.Side==team):
                        arr=element.StringStatus()
                        for i in arr:
                            list.insert(END,i)
                x+=1
            y+=1
            x=0
    def FillListOneUnit(Table: TableField,listInfo:Listbox,x,y):
        listInfo.delete(0, END)
        element=Table.field[x][y]
        if (element!=0):
            arr=element.Info()
            for i in arr:
                listInfo.insert(END,i)
        

   