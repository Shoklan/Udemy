## Exercises - Coding Basics

# 1. define the object "myobject"
#    and asign the vector 1:10 in at least 3 different ways

myobject <- c(1:10)
assign(myobject, c(1:10))
c(1:10) -> myobject

##### myobject = (1:10) was the one I missed

# 2. get the sum of your object
sum(myobject)

# 3. create the folling vectors by using the paste function
#  a. "R is great 4 and I will love it"
#  b. "R is great 7 and I will love it"
#  c. "R is great 45 and I will love it"

rString <- "R is great"
lString <- "and I will love it"

paste(rString, 4, lString)
paste(rString, 7, lString)
paste(rString, 45, lString)

#### He uses ("R is great", c(4,7,45), "and I will love it")
#### looks like there is a bit of "smart formatting" going on

# 4. vector of 1,2,3 repeat the vector
#    to get 11 x 1, 10 x 2, and 10 x 3
x <- c(rep(1, times=11), rep(2, times=10), rep(10, times=3))

# 5. what is the value of this vecot on position 7?
x[7]