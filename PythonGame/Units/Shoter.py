from .AbstractUnit import Unit
from random import *
class Shoter(Unit):
    def __init__(self,side,x,y):
        super().__init__()
        self.MaxHP=10
        self.HP=self.MaxHP
        self.ActivityStatus=2
        self.Speed=2
        self.Range=5
        self.Side=side#"Good"or"Evil""
        self.MinDamage=1
        self.MaxDamage=3
        self.PosX=x
        self.PosY=y
     # def DoDamage(self):
     #   random.random(self.MinDamage,self.MaxDamage)
    def GetPng(self):
        if(self.Side=="Good"):
            return ("Lab3/Photo/Good/2.png")
        if(self.Side=="Evil"):
            return ("Lab3/Photo/Evil/2.png")

        
         
