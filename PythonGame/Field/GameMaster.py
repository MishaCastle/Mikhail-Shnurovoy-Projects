from Field.SturctTurn import SturctTurn
from Field.TableField import TableField


class GameMaster:

    @staticmethod
    def MakeTurns(arrTurn: list[SturctTurn], Table: TableField):
        for Turn in arrTurn:
            if Turn.How == 2:
                GameMaster.Attack(Turn, Table)
            elif Turn.How == 1:
                GameMaster.Move(Turn, Table)
            else:
                return 1

        for row in Table.field:
            for tile in row:
                if tile != 0:
                    if(tile.Side==Table.Turn):
                        tile.Activiti()
        if (Table.Turn=="Good"):
            Table.Turn="Evil"
        elif (Table.Turn=="Evil"):
            Table.Turn="Good"
        else:
            return 1
        Table.howManyActiv()
        return 0

    @staticmethod
    def Move(Turn: SturctTurn, Table: TableField):
        unit = Table.field[Turn.WhoX][Turn.WhoY]

        unit.DoTurn()
        Table.field[Turn.WhereX][Turn.WhereY] = unit
        unit.PosX=Turn.WhereX
        unit.PosY=Turn.WhereY
        Table.field[Turn.WhoX][Turn.WhoY] = 0

    @staticmethod
    def Attack(Turn: SturctTurn, Table: TableField):
        unit = Table.field[Turn.WhoX][Turn.WhoY]

        target = Table.field[Turn.WhereX][Turn.WhereY]
        if(target==0):
            return 0
        unit.DoTurn()
        target.takeDamage(unit.doDamage())
        if(target.HP<=0):
            Table.field[Turn.WhereX][Turn.WhereY]=0
