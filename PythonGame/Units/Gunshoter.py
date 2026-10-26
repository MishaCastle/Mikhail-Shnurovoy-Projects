from .AbstractUnit import Unit
from random import *
class Gunshoter(Unit):
    def __init__(self,side,x,y):
        super().__init__()
        self.MaxHP=15
        self.HP=self.MaxHP
        self.ActivityStatus=3#take 2 trun to be activ again
        self.Speed=2
        self.Range=4
        self.Side=side#"Good"or"Evil""
        self.MinDamage=10
        self.MaxDamage=25
        self.PosX=x
        self.PosY=y
     # def DoDamage(self):
     #   random.random(self.MinDamage,self.MaxDamage)
    def GetPng(self):
        if(self.Side=="Good"):
            return ("Lab3/Photo/Good/5.png")
        if(self.Side=="Evil"):
            return ("Lab3/Photo/Evil/5.png")
    def isActiv(self):
            if(self.ActivityStatus==3):
                return(True)
            else:
                return(False)
    def Activiti(self):
        if(self.ActivityStatus<3):
                self.ActivityStatus+=1
    def StringStatus(self):
        isactiv=""
        if(self.ActivityStatus==3):
            isactiv="Activ"
        else:
            isactiv="NotActiv"
        arr=[type(self).__name__,"x "+str(self.PosX+1)+" y "+str(self.PosY+1),str(self.HP)+"/"+str(self.MaxHP),"ActivitiStatus:"+isactiv]
        return arr
    def Info(self):
        isactiv=""
        if(self.ActivityStatus==3):
            isactiv="Activ"
        else:
            isactiv="NotActiv"
        arr=[type(self).__name__,"x "+str(self.PosX+1)+" y "+str(self.PosY+1),
             str(self.HP)+"/"+str(self.MaxHP),
             "ActivitiStatus:"+isactiv,
             "Speed:"+str(self.Speed),
             "Range:"+str(self.Range),
             "Damage"+str(self.MinDamage)+"-"+str(self.MaxDamage)]
        return arr
    

        
         
