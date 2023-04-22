import requests
response = requests.get("http://api.open-notify.org/astros.json")
print(response)
con_page = response.content
print(con_page)
response.text
response.json()
query = {'lat': '45', 'lon': '180'}
response = requests.get(
    'http://api.open-notify.org/iss-pass.json', params=query)
print(response.json())
