from __future__ import print_function
from peewee import *
import json
from googleplaces import GooglePlaces, types, lang
import pprint
db = MySQLDatabase('padermeet_crawl', user='root')
class BaseModel(Model):
	class Meta:
		database = db

class Location(BaseModel):
	name = CharField()
	address = CharField()
	phone = CharField()
	email = CharField()
	token = CharField()
	website = TextField()
	maps_url = TextField()
class Days(BaseModel):
	name= CharField()
class OpeningHours(BaseModel):
	location = ForeignKeyField(Location)
	day = ForeignKeyField(Days, related_name='day')
	opened = TimeField()
	closed = TimeField()
class Reservation(BaseModel):
	location = ForeignKeyField(Location)
	date = DateField()
	canceld = BooleanField(default=False)	

db.connect()
db.drop_tables([Location, Days, OpeningHours, Reservation])
db.create_tables([Location, Days, OpeningHours, Reservation])

Days.create(name='Sonntag')
Days.create(name='Montag')
Days.create(name='Dienstag')
Days.create(name='Mittwoch')
Days.create(name='Donnerstag')
Days.create(name='Freitag')
Days.create(name='Samstag')

api_key = 'AIzaSyAJ4-7cvzD1FXN2JisaRlTdF3RzfXRUE7o'
google_places = GooglePlaces(api_key)
query_result = google_places.radar_search(lat_lng={'lat': 51.71905, 'lng': 8.75439}, keyword='bar', opennow=True, radius=1000)
i = 1
for place in query_result.places:
	token = binascii.hexlify(os.urandom(n))
    place.get_details()
    Location.create(place.name, place.formatted_address, place.international_phone_number, "email@me.com ,token,place.website,place.url)
    i = i + 1
    outputJson = place.details 
