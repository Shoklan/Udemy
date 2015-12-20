// Code does not have tuple returns like python does, unless there is a special
// format for the return unknown to me yet
package main

import "fmt"

func main() {
	var z int = 11
	fmt.Println(doubleReturn(z))
}

func doubleReturn(x int){
	return x / 2, x % 2
}