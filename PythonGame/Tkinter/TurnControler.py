
from Field.SturctTurn import SturctTurn
from Field.TableField import TableField
from Field.TurnCheker import TurnCheker
from Field.Validator import Validator
from Field.GameMaster import GameMaster
from Tkinter.FieldControler import FieldControler
from Tkinter.ListBoxControler import ListBoxControler
from tkinter import *
class TurnControler():
    @staticmethod
    def Turn(arrTurn: list[SturctTurn], Table: TableField,FieldFrame: Frame,imgContainer,listRed:Listbox,listBlue:Listbox):
        if(not Validator.Validate(arrTurn)):
            return 1
        if(not TurnCheker.GenValidate(arrTurn,Table)):
            return 1
        if(not TurnCheker.AttackValidate(arrTurn,Table)):
            return 1
        if(not TurnCheker.MoveValidate(arrTurn,Table)):
            return 1
        GameMaster.MakeTurns(arrTurn,Table)
        FieldControler.Fill(Table,FieldFrame,imgContainer)
        ListBoxControler.FillList(Table,listRed,"Evil")
        ListBoxControler.FillList(Table,listBlue,"Good")
        
        
    