package main

import "fmt"

func main(){
	c := make(chan int)
	// Remember that if the channel exists at run level vs
	// inside a function that this will generate a deadlock
	go func(){
		c <- 1}
	}()
	fmt.Println(<-c)
	
}