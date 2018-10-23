package main

import "github.com/jjeffery/stomp"
import "fmt"

func main() {
	conn, err := stomp.Dial("tcp", "localhost:61613")
	if err != nil {
		panic(err)
	}

	sub, err := conn.Subscribe("Consumer.D.VirtualTopic.Orders", stomp.AckClient)
	if err != nil {
		panic(err)
	}

	// receive 5 messages and then quit
	for i := 0; i < 5; i++ {
		msg := <-sub.C
		if msg.Err != nil {
      panic(msg.Err)
		}

		doSomethingWith(msg)

		// acknowledge the message
		err = conn.Ack(msg)
		if err != nil {
      panic(err)
		}
	}

	err = sub.Unsubscribe()
	if err != nil {
    panic(err)
	}

	conn.Disconnect()
}

func doSomethingWith(msg *stomp.Message) {
  fmt.Println(msg.Body)
}