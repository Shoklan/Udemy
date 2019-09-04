# CCNP BootCamp
## Chris Bryant

# Fundamentals Review
- We're going to see both real world examples as well Cert info.
- Also, he has a book now.


# VLAN Fundamentals, Configuration and Troubleshooting
- No floppy disks!
- We also wont be talking about Hubs since they're the predecessor to todays switches.
- With one big collision domain, we need rules about who gets to transmit when.
- With those collisions, this can cause retransmits - which can further lead to more collisions.
- The set of rules for transmitting over Ethernet is **Carrier Sense Multiple Access with Collision Detection (CSMA/CD)**.
- The first step is to listen to the wire for if another host is sending data.
  1. If it is, then back off and check again in a few milliseconds.
  2. If it is not, then send it off.
- If there is a collision, then the voltage on the wire will change indicating a data collision.
- Even with this, there will still be collisions but just not as many.
- They then send a Jam signal to not send anything due to the collision.
- The sending host will invoke a backoff timer; a random number of milliseconds to wait before trying again.
- This is how it used to be done; which is not feasible.
- Instead, there is a separate collision domain for each host now.
- This is called **Microsegmentation**.
- This solves the collisions problem but not the broadcast domain.
- We'll come back to this when we work on VLANs.
- The switch looks at the source MAC address first before any other value.
- It does this to build and maintain its MAC Address Table.
- We might end up adding some routes but we'll normally allow dynamic routing protocols to do the work.
- Don't set them all statically; save yourself.
- When you have to make the choice between the hardware or your doing the work, let the hardware do it.
- When you first boot a switch, the MAC Address Table is not empty.
- To see the table, use `show mac address-table`.
- If you only want the dynamic entries then you use append the previous command with `dynamic`.
- Actions:
  * Forwarded.
  * Filtered.
  * Flooded.
- It will next ask "Do I have a destination MAC Address"?
- If no, it will **Flood the Frame** which means it will send it out on all ports minus the receive port.
- Frames with  all Fs are **Broadcast Frames**.
- The default aging time is 300 seconds.
- You can change the MAC Address Aging Time.
- Another advantage of this dynamic behavior is to adapt to changes in the port.
- The **Content Addressable Memory (CAM)** is enough for Layer 2 only.
- Multilayer Tables use the **Ternary Content Addressable Memory Table (TCAM)** instead.
- You shouldn't need to configure this but have to know about it.
- **SDM** stands for **Switch Database Manager**.
- With respect to the Autonegotiation, **leave it alone**.
- What this does is send a **Fast Link Pulses**.
- It's a declaration of the capabilities of the sending device with regards to speed and duplex.
-


# The VLAN Trunking Protocol

# Spanning Tree Protocol Fundamentals

# Advanced STP Features

# RSTP & MST

# More to Come

# Reference:

# Research:
