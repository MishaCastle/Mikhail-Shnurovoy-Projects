from .AbstractUnit import Unit
from random import *
class Cavalary(Unit):
    def __init__(self,side,x,y):
        super().__init__()
        self.MaxHP=25
        self.HP=self.MaxHP
        self.ActivityStatus=2
        self.Speed=5
        self.Range=1
        self.Side=side#"Good"or"Evil""
        self.MinDamage=5
        self.MaxDamage=15
        self.PosX=x
        self.PosY=y
     # def DoDamage(self):
     #   random.random(self.MinDamage,self.MaxDamage)
    def GetPng(self):
        if(self.Side=="Good"):
            return ("Lab3/Photo/Good/4.png")
        if(self.Side=="Evil"):
            return ("Lab3/Photo/Evil/4.png")

        
         
