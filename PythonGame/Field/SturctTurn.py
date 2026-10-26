class SturctTurn():
    def __init__(self,x1,y1,x2,y2,how: bool):
        self.Who=[x1,y1]
        self.WhoX=x1
        self.WhoY=y1
        self.Where=[x2,y2]
        self.WhereX=x2
        self.WhereY=y2
        if(how):
            self.How=2
        else:
            self.How=1
    def __str__(self):
        return f"Who: {self.Who[0]} {self.Who[1]} " \
           f"Where: {self.Where[0]} {self.Where[1]} " \
           f"How: {self.How}"