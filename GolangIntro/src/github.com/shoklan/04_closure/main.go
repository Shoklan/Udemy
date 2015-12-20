package main

import "fmt"

func wrapper() func() int{
	x := 0
	return func() int{
		x++
		return x
	}
}

func main() {
	increment := wrapper()
	fmt.Println(increment())
	fmt.Println(increment())
}