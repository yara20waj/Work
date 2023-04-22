import datetime
import re
global Studet_name, list_college, list_serialnumber, list_spli, list_first_college, list_second_college, list_serialnumber1, list_serialnumber2
Studet_name = []
list_college = []
list_split = []
list_serialnumber = []
list_first_college = []
list_second_college = []
list_serialnumber1 = []
list_serialnumber2 = []


class Person:
    def __init__(self, firstn, middlename, lastname, birth, gender, id, phonenumder):
        self.firstn = firstn
        self.middlename = middlename
        self.lastname = lastname
        self.birth = birth
        self.gender = gender
        self.__private_member = id
        self.phonenumder = phonenumder

    def getAge(self):
        curr = datetime.date.today()
        age = curr.year-self.birth.year
        if curr < datetime.date(curr.year, self.birth.month, self.birth.day):
            age = 1

        return age


class College:
    def __init__(self, college_name, capacity):

        self.name_college = college_name
        self.mname = capacity


college_size = 0
C_S = 2
for capacity in range(college_size, C_S):

    def PrintInitials(name):
        if (len(name) == 1):
            return
        words = name.split(" ")
        for word in words:
            split_name = (word[0].upper())
            list_split.append(split_name)

    if __name__ == '__main__':
        name = input("Enter College  Subject:> ")
        if(name in list_college):
            print("\n".format(
                name))  # Error Message
        else:
            list_college.append(name)

            for members in list_college:
                print("{}".format(members))
        PrintInitials(name)
    Y = 3

    def UpdateTotalStudents():
        capacity = 0
        # Y = 3
        capacity_college = 0
        for capacity in range(capacity, Y):
            first_name = input("Enter your First Name>")
            middle_name = input("Enter middle Name>")
            last_name = input("Enter last Name :")
            birth_year = int(input("Enter your birth year: "))
            birth_stu_year = datetime.datetime.now().year
            Current_age = birth_stu_year - birth_year
            print("Your current age is ", Current_age)
            grn = input("Enter Gender (M,F):")
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

            list_serialnumber.append(id)
            if(len(list_college) == 1):
                list_serialnumber1.append(id)
            if(len(list_college) == 2):
                list_serialnumber2.append(id)

            for members in list_serialnumber:
                print("=> {}".format(members))
            idnum = input("Please enter Id :")
            phonenum = input('Enter your phone number: ')
            Pattern = re.compile("[0-9]{3}-[0-9]{3}-[0-9]{4}")
            if Pattern.match(phonenum):
                print('Valid Mobile Number')
                capacity = capacity+1
            else:
                print("Invalid Mobile Number")
            full_name = str((first_name)+' '+(middle_name)+' '+(last_name))
            if(full_name in Studet_name):
                print("\nThis Member {} Already In The Database".format(
                    full_name))
            else:
                Studet_name.append(full_name)

            if(len(list_college) == 1):
                list_first_college.append(full_name)
            if(len(list_college) == 2):
                list_second_college.append(full_name)

            for members in Studet_name:
                print("=> {}".format(members))
            person = Person(first_name, middle_name, last_name, birth_year,
                            grn, idnum, phonenum)

            capacity_college = capacity_college+1
            if (capacity == 2):
                msg = input(
                    "I want to add one more student(Y/N)")
                if (msg == "Y"):
                    continue
                else:
                    if (msg == "N"):

                        break

    UpdateTotalStudents()


def getinfo():
    mes = input("Which college object want to viw(1/2)")
    if (mes == "1"):
        spilit = 0
        goll = 0
        n = 0
        for p_split in range(len(list_first_college)):
            print("Student registered succesfully in  {} {}{}".format(
                list_college[spilit], list_split[goll], list_split[goll + 1]))

        print("\n{} ({}{}) with ({},{}) ".format(
            list_college[p_split], list_split[n], list_split[n+1], len(list_first_college), Y))

        temp = len(list_first_college) * '\n% s \nID: %% s'
        res = temp % tuple(list_first_college) % tuple(list_serialnumber1)
        print("\n" + res)

    else:
        p_split = 0
        jnum = 0
        m = 0
        for p_split in range(len(list_second_college)):
            print("Student registered succesfully in  {} {}{}".format(
                list_college[1], list_split[jnum+2], list_split[jnum+3]), end=" "+"\n")

        print("\n{} ({}{}) with ({},{}) ".format(
            list_college[1], list_split[m+2], list_split[m+3], len(list_second_college), Y))
        temp = len(list_second_college) * '\n% s \nID: %% s'
        res = temp % tuple(list_second_college) % tuple(list_serialnumber2)
        print("\n" + res)


getinfo()


class Student(Person):
    def _init_(self, firstName, lastName, age, gender):
        super().__init__(self, firstName, lastName, age, gender)

        self.age = age
        if(age < 0 or age > 18):
            raise Exception('Age should be within range 0-18')
        self.gender = gender
