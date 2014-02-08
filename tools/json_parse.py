#!/usr/bin/python
#encoding=utf-8

import json

# string  =" monitor { counter: 527, CostTime: 136, FromNode: 2, TempC1:22.00, TempC2:23.50, TempC3:22.50, humd: 0.00, PIR: 0, SwitchState: 00000000, AlarState: 00000000 }"

json_string = '{"name": "monitor", "Counter": 10, "CostTime": 768, "FromNode": 3, "TempC":[26.31, 0.00,0.00], "Humd": 0.00, "PIR": 0, "SwitchState": [0,0,0,0,0,0,0,0], "AlarmState": [0,0,0,0,0,0,0,0] }'

#json_string = '{"Name":"info", "Counter": 527, "CostTime": 136, "FromNode": 2, "TempC":[22.00, 23.50, 22.50], "Humd": 0.0, "PIR": 0, "SwitchState":[0,0,0,0,0,0,0,0], "AlarmState":[0,0,0,0,0,0,0,0] }'

print"========================================================================="
print"1. test json string: "
print json_string
'''
encode_json = json.dumps( json_string )
print"2. encode json :" 
print encode_json
print"type of encode json = json.dumps():" + str( type( encode_json ) )
print"length of encode_json: " + str( len( encode_json) )
'''

encode_json = json_string
decode_json = json.loads( encode_json )
print"3. decode json : "
print decode_json
print"type of decode json = json.loads():" + str( type( decode_json ) )
print"length of decode_json: %d"  %len( decode_json)

for name, value  in decode_json.items():
    print "[%s]:    %s" %(name, value) 

print decode_json['TempC']
#in [22,33,44] value is list type
print type( decode_json['TempC'] )
print"counter [%s]: %s" %(decode_json['Counter'], decode_json['TempC'] )


'''
encode_json = json.dumps(obj)
print("------------ encode --------------------")
print repr(obj)
print encode_json

print("------------ decode --------------------")
decode_json = json.loads( encode_json )
print type( decode_json)
print decode_json
print decode_json.keys()
'''



