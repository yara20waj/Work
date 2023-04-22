from tkinter import N
from grpc import services
import phonenumbers
from test import number
from phonenumbers import carrier
from phonenumbers import geocoder
ch_nmber = phonenumbers.parse(number, "CH")
print(geocoder.description_for_number(ch_nmber, "en"))
services_nmber = phonenumbers.parse(number, "RO")
print(carrier.name_for_number(services_nmber, "en"))
