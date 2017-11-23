# roleplayingsheets

## How it works

- **index** needs a "campaign" GET parameter, indicating the id of the campaign (the directory name). For now, it is not secure, and you can see other's campaigns. I haven't implemented authentication yet.
- With this parameter, index will call **creating sheets**. Creating sheets links the json file with every character's details with another json file, with more general and re-usable items. The object "json_persos", created this way, contains the character's sheets.
- **view** is specific to a campaign. It uses the json_persos object to create a view of the character's sheets. HTML, CSS, and Javascript, may be different depending of the campaign.

## But... Why ?

Because me and my friends were using a new universe for roleplaying games, and we needed a simple way to see everyone's sheet. The next tasks I will have to do are:
- Implement authentication
- Allowing DM to edit the character's sheets
- Allowing DM to create new objects
