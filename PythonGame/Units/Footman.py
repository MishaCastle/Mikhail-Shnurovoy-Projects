from .AbstractUnit import Unit
from random import *
class Footman(Unit):
    def __init__(self,side,x,y):
        super().__init__()
        self.MaxHP=10
        self.HP=self.MaxHP
        self.ActivityStatus=2
        self.Speed=3
        self.Range=1
        self.Side=side#"Good"or"Evil""
        self.MinDamage=2
        self.MaxDamage=4
        self.PosX=x
        self.PosY=y
     # def DoDamage(self):
     #   random.random(self.MinDamage,self.MaxDamage)
    def GetPng(self):
        if(self.Side=="Good"):
            return ("Lab3/Photo/Good/1.png")
        if(self.Side=="Evil"):
            return ("Lab3/Photo/Evil/1.png")

        
         
