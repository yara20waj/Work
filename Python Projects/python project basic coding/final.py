import datetime
import re

from regex import P
global listStd, list_goll, list_id, list_split, list_capacity_college1, list_capacity_college2, list_capacity_id1, list_capacity_id2
listStd = []
list_cgl = []
list_split = []
list_id = []
list_capacity_college1 = []
list_capacity_college2 = []
list_capacity_id1 = []
list_capacity_id2 = []


class Person:
    def __init__(self, fname, mname, lname, DOB, gender, id, mobile):
        self.fname = fname
        self.mname = mname
        self.lname = lname
        self.DOB = DOB
        self.gender = gender
        self.__private_member = id
        self.mobile = mobile

    def getAge(self):
        curr = datetime.date.today()
        age = curr.year-self.DOB.year
        if curr < datetime.date(curr.year, self.DOB.month, self.DOB.day):
            age = 1

        return age


class College:
    def __init__(self, namecoll, capacity):

        self.name_college = namecoll
        self.mname = capacity


capacity_college = 0
R = 2
for capacity in range(capacity_college, R):

    def PrintInitials(name):
        if (len(name) == 1):
            return
        words = name.split(" ")
        for word in words:
            split_name = (word[0].upper())
            list_split.append(split_name)

    if __name__ == '__main__':
        name = input("Please enter College  Name :> ")
        if(name in list_cgl):
            print("\n".format(
                name))  # Error Message
        else:
            list_cgl.append(name)

            for members in list_cgl:
                print("=> {}".format(members))
        PrintInitials(name)
    Y = 3

    def UpdateTotalStudents():
        capacity = 0
        # Y = 3
        capacity_college = 0
        for capacity in range(capacity, Y):
            first = input("\nPlease enter First Name :")
            middle = input("Please enter middle Name :")
            last = input("Please enter last Name :")
            Year_of_birth = int(input("In which year you took birth: "))
            current_year = datetime.datetime.now().year
            Current_age = current_year - Year_of_birth
            print("Your current age is ", Current_age)
            grn = input("Please enter Gender (M,F):")
            c = capacity+1
            if(grn == "M"):
                if(c <= 3):
                    name1 = "{}".format(str(c).zfill(4))
                    id = ("1"+"2022" + name1)
            else:
                if(grn == "F"):
                    if(c <= 3):
                        name1 = "{}".format(str(c).zfill(4))
                        id = ("2"+"2022" + name1)

            list_id.append(id)
            if(len(list_cgl) == 1):
                list_capacity_id1.append(id)
            if(len(list_cgl) == 2):
                list_capacity_id2.append(id)

            for members in list_id:
                print("=> {}".format(members))
            idnum = input("Please enter Id :")
            phonenum = input('Please enter a mobile number to validate: ')
            Pattern = re.compile("[0-9]{3}-[0-9]{3}-[0-9]{4}")
            if Pattern.match(phonenum):
                print('Valid Mobile Number')
                capacity = capacity+1
            else:
                print("Invalid Mobile Number")
            full_name = str((first)+' '+(middle)+' '+(last))
            if(full_name in listStd):
                print("\nThis Member {} Already In The Database".format(
                    full_name))
            else:
                listStd.append(full_name)

            if(len(list_cgl) == 1):
                list_capacity_college1.append(full_name)
            if(len(list_cgl) == 2):
                list_capacity_college2.append(full_name)

            for members in listStd:
                print("=> {}".format(members))
            person = Person(first, middle, last, Year_of_birth,
                            grn, idnum, phonenum)

            capacity_college = capacity_college+1
            if (capacity == 2):
                msg = input(
                    "Whould you want to enter another student information(Y/N)")
                if (msg == "Y"):
                    continue
                else:
                    if (msg == "N"):

                        break

    UpdateTotalStudents()


def getinfo():
    mes = input("Whitch college want to viw(1/2)")
    if (mes == "1"):
        s = 0
        g = 0
        n = 0
        for i in range(len(list_capacity_college1)):
            print("Student registered succesfully in  {} {}{}".format(
                list_cgl[s], list_split[g], list_split[g + 1]))

        print("\n{} ({}{}) with ({},{}) ".format(
            list_cgl[i], list_split[n], list_split[n+1], len(list_capacity_college1), Y))

        temp = len(list_capacity_college1) * '\n% s \nID: %% s'
        res = temp % tuple(list_capacity_college1) % tuple(list_capacity_id1)
        print("\n" + res)

    else:
        P = 0
        j = 0
        m = 0
        for i in range(len(list_capacity_college2)):
            print("Student registered succesfully in  {} {}{}".format(
                list_cgl[1], list_split[j+2], list_split[j+3]), end=" "+"\n")

        print("\n{} ({}{}) with ({},{}) ".format(
            list_cgl[1], list_split[m+2], list_split[m+3], len(list_capacity_college2), Y))
        temp = len(list_capacity_college2) * '\n% s \nID: %% s'
        res = temp % tuple(list_capacity_college2) % tuple(list_capacity_id2)
        print("\n" + res)


getinfo()


class Student(Person):
    def _init_(self, firstName, lastName, age, gender):
        super().__init__(self, firstName, lastName, age, gender)

        self.age = age
        if(age < 0 or age > 18):
            raise Exception('Age should be within range 0-18')
        self.gender = gender
