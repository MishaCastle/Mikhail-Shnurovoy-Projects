from random import *
class Unit():
    def __init__(self):
        self.MaxHP = 0
        self.HP = 0
        self.ActivityStatus = 0#0 is to be inactiv 1 is inactiv 2 is activ
        self.Speed = 0
        self.Range = 0
        self.Side = ""
        self.MinDamage = 0
        self.MaxDamage = 0
        
        self.PosX=0
        self.PosY=0
    def doDamage(self):
        return randint(self.MinDamage,self.MaxDamage)
    def changeStatus(self):
        if(self.ActivityStatus<2):
            self.ActivityStatus+=1

    def takeDamage(self,Damage):
        self.HP=self.HP-Damage
    def GetPng():
        pass
    def DoTurn(self):
        self.ActivityStatus=0
    def isActiv(self):
        if(self.ActivityStatus==2):
            return(True)
        else:
            return(False)
    def Activiti(self):
        if(self.ActivityStatus<2):
            self.ActivityStatus+=1
    def StringStatus(self):
        isactiv=""
        if(self.ActivityStatus==2):
            isactiv="Activ"
        else:
            isactiv="NotActiv"
        arr=[type(self).__name__,"x "+str(self.PosX+1)+" y "+str(self.PosY+1),str(self.HP)+"/"+str(self.MaxHP),"ActivitiStatus:"+isactiv]
        return arr
    def Info(self):
        isactiv=""
        if(self.ActivityStatus==2):
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