from tkinter import *

from Field import TableField
class FieldControler:#fills the field with image
    @staticmethod
    def Fill(Table: TableField,FieldFrame: Frame,imgContainer):
        x=0;y=0
        for row in Table.field:
            for element in row: 
                if (element!=0):
                    widget = FieldFrame.grid_slaves(row=x, column=y)[0]
                    widget.delete("all")
                    img2=PhotoImage(file=element.GetPng())
                    imgContainer[x][y]=img2
                    widget.create_image(1, 1, anchor=NW, image=img2)
                else:
                    widget = FieldFrame.grid_slaves(row=x, column=y)[0]
                    widget.delete("all")
                x+=1
                
            y+=1
            x=0
                
        
        
    