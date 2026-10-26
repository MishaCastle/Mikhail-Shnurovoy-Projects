from Units.AbstractUnit import Unit
from Units.Cavalary import Cavalary
from Units.Footman import Footman
from Units.Gunshoter import Gunshoter
from Units.Shoter import Shoter
from Units.Tank import Tank

class TableField():
    def __init__(self):
        self.field = [[0 for j in range(8)] for i in range(8)]
        file = open(r"C:\Users\Admin\Desktop\PythonDnuShnurovoy\Lab3\Field\startpos.txt", "r")
        content = file.read()
        x=0
        y=0
        self.ActiveBlue=0
        self.ActiveRed=0
        for line in content:
            match line:
                case "F":
                    self.field[x][y]=Footman("Good",x,y)
                    self.ActiveBlue+=1
                    x+=1
                case "T":
                    self.field[x][y]=Tank("Good",x,y)
                    self.ActiveBlue+=1
                    x+=1

                case "A":
                    self.field[x][y]=Shoter("Good",x,y)
                    self.ActiveBlue+=1
                    x+=1
                case "C":
                    self.field[x][y]=Cavalary("Good",x,y)
                    self.ActiveBlue+=1
                    x+=1
                case "G":
                    self.field[x][y]=Gunshoter("Good",x,y) 
                    self.ActiveBlue+=1
                    x+=1
                case "f":
                    self.field[x][y]=Footman("Evil",x,y)
                    self.ActiveRed+=1
                    x+=1
                case "t":
                    self.field[x][y]=Tank("Evil",x,y)
                    self.ActiveRed+=1
                    x+=1
                case "a":
                    self.field[x][y]=Shoter("Evil",x,y)
                    self.ActiveRed+=1
                    x+=1
                case "c":
                    self.field[x][y]=Cavalary("Evil",x,y)
                    self.ActiveRed+=1
                    x+=1
                case "g":
                    self.field[x][y]=Gunshoter("Evil",x,y) 
                    self.ActiveRed+=1
                    x+=1
                case "\n":
                    y+=1
                    x=0
                case _:
                    self.field[x][y]=0
        self.Turn="Good"#also can be Evil

    def howManyActiv(self):
        self.ActiveBlue=0
        self.ActiveRed=0
        for row in self.field:
            for unit in row:
                if unit!=0:
                    if(unit.isActiv()):
                        if unit.Side=="Good":
                            self.ActiveBlue+=1 
                        elif unit.Side=="Evil":
                            self.ActiveRed+=1