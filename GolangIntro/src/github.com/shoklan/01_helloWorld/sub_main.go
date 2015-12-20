// This is just about the format type for printing output
// this is for passing values via type - aka decimal, and binary here.
package main

import "fmt"

var path := "github.com/shoklan/02_package/stringutil/name.go"

func main() {
	fmt.Printf("%d - %b\n", 42, 42)
}