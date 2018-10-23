import stomp
import time
 
class SampleListener(object):
  def on_message(self, headers, msg):
    print(msg)
 
conn = stomp.Connection10()
 
conn.set_listener('SampleListener', SampleListener())
 
conn.start()
 
conn.connect()
 
conn.subscribe('Consumer.C.VirtualTopic.Orders')

# todo: infinite loop instead of timeout
time.sleep(1000) # secs
 
conn.disconnect()
