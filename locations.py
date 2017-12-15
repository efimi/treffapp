from __future__ import print_function
from googleplaces import GooglePlaces, types, lang
import pprint

api_key = 'AIzaSyAJ4-7cvzD1FXN2JisaRlTdF3RzfXRUE7o'

google_places = GooglePlaces(api_key)
pp = pprint.PrettyPrinter(indent=4)
# You may prefer to use the text_search API, instead.
# query_result = google_places.nearby_search(
#         location='Paderborn, Germany', keyword='bar',
#         radius=1000)
query_result = google_places.radar_search(
        lat_lng={'lat': 51.71905, 'lng': 8.75439}, keyword='bar', opennow=True, radius=1000)
        # radius=700, types=[types.TYPE_FOOD])
# If types param contains only 1 item the request to Google Places API
# will be send as type param to fullfil:
# http://googlegeodevelopers.blogspot.com.au/2016/02/changes-and-quality-improvements-in_16.html

# if query_result.has_attributions:
#     print ("Attribute")
#     pp.pprint (query_result.html_attributions)

i = 1
for place in query_result.places[1:2]:
    # Returned places from a query are place summaries.
    place.get_details()
    # print (i, place.name,place.formatted_address,place.international_phone_number,place.website,place.url, sep=';', end='\n')
    # The following method has to make a further API call.
    i = i + 1
    # Referencing any of the attributes below, prior to making a call to
    # get_details() will raise a googleplaces.GooglePlacesAttributeError.
    pp.pprint (place.details )# A dict matching the JSON response from Google.
    # print (place.local_phone_number)
    print ()

    print ()
    print ()
        
    # for photo in place.photos[:2]:
    #     photo.get(maxheight=500, maxwidth=500)
    #     print (photo.url)

    # Getting place photos
#
#     for photo in place.photos:
#         # 'maxheight' or 'maxwidth' is required
#         photo.get(maxheight=500, maxwidth=500)
#         # MIME-type, e.g. 'image/jpeg'
#         photo.mimetype
#         # Image URL
#         # Original filename (optional)
#         photo.filename
#         # Raw image data
#         photo.data
#
#
# # Are there any additional pages of results?
# if query_result.has_next_page_token:
#     query_result_next_page = google_places.nearby_search(
#             pagetoken=query_result.next_page_token)
