from Field.SturctTurn import SturctTurn
from Field.TableField import TableField
class Validator:
    
    @staticmethod
    def Validate(arrTurn: list[SturctTurn]) -> bool:
        for Turn in arrTurn:
            if not (
            0 <= Turn.WhoX < 8 and
            0 <= Turn.WhoY < 8 and
            0 <= Turn.WhereX < 8 and
            0 <= Turn.WhereY < 8
        ):
                return False
        return True

   