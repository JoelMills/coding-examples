Coding Example: Basic Manual Transcription App

Description: 
This code does the following:

Get JSON data. (keys: time and transcript)
Parses the data into an Object.
Convert it to a dictionary object for fast lookup (incase there's lots of data)
Searches the dictionary twice every second for the matching video time in rounded seconds.
If a match is found, it displays the caption for the matching time.

To be changed/added:

An "end time" key/value for caption cutoff time.
Change current rounded time to a single decimal place time for more accurate transcribing.
Create JQuery plugin for display options.
Create Database and CMS (crud) for transcription.
