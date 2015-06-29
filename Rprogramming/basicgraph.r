### Graphs in R

# many different types are available
# different packages can help you
# easiest way: scatterplot
x=5:7
y=8:10
plot(x,y)

# or by using a dataset
plot(lynx)
plot(lynx, main="Lunx Trappings", col="red",
     col.main=52, cex.main=1.5)
# the cex faimily can be used to change magnification factors.

# handling the labs
plot(lynx, ylab="Lynx Trappings", xlab="")
plot(lynx, ylab="Lynx Trappings", xlab="", las=2)
# changing the scale directon

# Skipping adding plot data since I need to shower.