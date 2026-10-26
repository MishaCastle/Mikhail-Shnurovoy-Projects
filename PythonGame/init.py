from Tkinter.FieldControler import FieldControler
from Tkinter.ListBoxControler import ListBoxControler
from Tkinter.TurnControler import TurnControler
from Field.TableField import TableField
from Field.SturctTurn import SturctTurn
#from Field.GameMater import GameMaster
from tkinter import *
from PIL import ImageTk, Image
def Turn(event):
    for i in range(1, 4):
        for j in range(1, 8, 2):
            widget = InputFrame.grid_slaves(row=i, column=j + 1)[0]
            if widget.get() == "":
                return 1;
    arrTrun=[]
    i=1
    MaxTurn=0
    if(Table.Turn=="Good"):
        MaxTurn=Table.ActiveBlue
    elif(Table.Turn=="Evil"):
        MaxTurn=Table.ActiveRed
    
    while(InputFrame.grid_slaves(row=i, column=0)and i<=MaxTurn):
        
        widget = InputFrame.grid_slaves(row=i, column=2)[0]
        x1=int(widget.get())-1
        widget = InputFrame.grid_slaves(row=i, column=4)[0]
        y1=int(widget.get())-1
        widget = InputFrame.grid_slaves(row=i, column=6)[0]
        x2=int(widget.get())-1
        widget = InputFrame.grid_slaves(row=i, column=8)[0]
        y2=int(widget.get())-1
        How=arrCheckBox[i - 1].get()
        arrTrun.append(SturctTurn(x1,y1,x2,y2,How))
        i+=1
    #print(arrTrun[1])
    TurnControler.Turn(arrTrun,Table,FieldFrame,imgContainer,listRed,listBlue)
    LabTurn.config(text=Table.Turn)
    for i in range(1, 4):     
        for j in range(1,8,2):
            widget = InputFrame.grid_slaves(row=i, column=j+1)[0]
            widget.delete(0, END)
    #print(arrTrun)
def CanvasClick(event):
    canvas = event.widget

    y = canvas.grid_info()["row"] + 1
    x = canvas.grid_info()["column"] + 1

    if event.num == 1:
        colX = 2  # x1
        colY = 4  # y1
    elif event.num == 3:
        colX = 6  # x2
        colY = 8  # y2
    else:
        return

    for i in range(1, 4):
        entX = InputFrame.grid_slaves(row=i, column=colX)[0]
        entY = InputFrame.grid_slaves(row=i, column=colY)[0]

        if entX.get() == "" or entY.get() == "":
            entX.delete(0, END)
            entX.insert(0, str(x))

            entY.delete(0, END)
            entY.insert(0, str(y))
            return 1
def CanvasInfoClick(event):
    canvas = event.widget
    
    y = canvas.grid_info()["row"] 
    x = canvas.grid_info()["column"]
    ListBoxControler.FillListOneUnit(Table,listInfo,x,y)

    pass
#ROOT

root = Tk()     
root.title("Приложение на Tkinter")    
root.geometry("1200x750")

#FRAMES

FieldFrame = Frame(root)
FieldFrame.grid(row=0, column=0, sticky="nw")

DataFrame = Frame(root)
DataFrame.grid(row=0, column=1, sticky="ne")

InputFrame= Frame(root,width=40,height=20)
InputFrame.grid(row=1, column=0, sticky="sw")

#FIELD

for i in range(8):
    for j in range(8):
        Png=Canvas(FieldFrame,width=60,height=66,bg='black')
        Png.grid(row=i,column=j)
        Png.bind("<Button-1>", CanvasClick)  # Левая кнопка
        Png.bind("<Button-2>", CanvasInfoClick)  # Левая кнопка
        Png.bind("<Button-3>", CanvasClick)  # Правая кнопка
#widget = FieldFrame.grid_slaves(row=4, column=2)[0]
#img2=PhotoImage(file="Lab3/Photo/Good/1.png")
#widget.create_image(1, 1, anchor=NW, image=img2)

#LISTBOXES

listBlue = Listbox(DataFrame, width=30, height=35)
listBlue.pack(side=LEFT)

listRed = Listbox(DataFrame, width=30, height=35)
listRed.pack(side=LEFT)
listInfo = Listbox(DataFrame, width=30, height=10)
listInfo.pack(side=LEFT)
#INPUT

Label(InputFrame, text="isAtaking").grid(row=0, column=0)#if checked is ataking
Label(InputFrame, text="Who").grid(row=0, column=1)
Label(InputFrame, text="Where").grid(row=0, column=4)
arrCheckBox = []

for i in range(1, 4):
    checkVar = BooleanVar()
    arrCheckBox.append(checkVar)

    Checkbutton(
        InputFrame,
        variable=checkVar
    ).grid(row=i, column=0)
    for j in range(1,8,2):
        if((j-1)%4==0):
            Label(InputFrame, text="x").grid(row=i, column=j)
        else:
            Label(InputFrame, text="y").grid(row=i, column=j)
        Entry(InputFrame, width=7).grid(row=i, column=j+1)

butTurn = Button(InputFrame, text="Turn")
butTurn.grid(
    row=2,
    column=9,
    padx=20
)
butTurn.bind('<Button-1>',Turn)
LabTurn = Label(InputFrame, text="Good")
LabTurn.grid(row=3, column=9, padx=20)

#INIT OF THE GAME

imgContainer=[[0 for j in range(8)] for i in range(8)]
Table=TableField()
FieldControler.Fill(Table,FieldFrame,imgContainer)
ListBoxControler.FillList(Table,listBlue,"Good")
ListBoxControler.FillList(Table,listRed,"Evil")
root.mainloop()