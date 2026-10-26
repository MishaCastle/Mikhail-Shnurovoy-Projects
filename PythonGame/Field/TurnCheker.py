from Field.SturctTurn import SturctTurn
from Field.TableField import TableField


class TurnCheker:
    @staticmethod
    def GenValidate(arrTurn: list[SturctTurn], Table: TableField) -> bool:
        for i in range(len(arrTurn)):
            for j in range(i + 1, len(arrTurn)):
                if (arrTurn[i].WhoX == arrTurn[j].WhoX and
                    arrTurn[i].WhoY == arrTurn[j].WhoY):
                    return False
        for Turn in arrTurn:
            if Table.field[Turn.WhoX][Turn.WhoY] == 0:
                return False
            if Table.field[Turn.WhoX][Turn.WhoY].Side != Table.Turn:
                return False
            if not Table.field[Turn.WhoX][Turn.WhoY].isActiv():
                return False
        return True
    @staticmethod
    def AttackValidate(arrTurn: list[SturctTurn], Table: TableField) -> bool:
        arrTurnAttack = []

        for Turn in arrTurn:
            if Turn.How == 2:
                arrTurnAttack.append(Turn)
        for Turn in arrTurnAttack:
            if Table.field[Turn.WhereX][Turn.WhereY] == 0:
                return False
            distance =  abs(Turn.WhoX - Turn.WhereX) +abs(Turn.WhoY - Turn.WhereY)
            if Table.field[Turn.WhoX][Turn.WhoY].Range < distance:
                return False
        return True
    @staticmethod
    def MoveValidate(arrTurn: list[SturctTurn], Table: TableField) -> bool:
        arrTurnMove = []
        for Turn in arrTurn:
            if Turn.How == 1:
                arrTurnMove.append(Turn)
        for i in range(len(arrTurnMove)):
            for j in range(i + 1, len(arrTurnMove)):
                if (arrTurnMove[i].WhereX == arrTurnMove[j].WhereX and
                    arrTurnMove[i].WhereY == arrTurnMove[j].WhereY):
                    return False        
        for Turn in arrTurnMove:
            distance =  abs(Turn.WhoX - Turn.WhereX) + abs(Turn.WhoY - Turn.WhereY)

            if Table.field[Turn.WhereX][Turn.WhereY] != 0:
                return False
            if Table.field[Turn.WhoX][Turn.WhoY].Speed < distance:
                return False

        return True