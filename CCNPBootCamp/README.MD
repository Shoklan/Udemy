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
- The reason they're not using them is the problem of switching loops at Layer 2.


- With IP phones, there are usually three connectors:
  1. Connection to a Switch.
  2. Connection to a PC.
  3. Connection to an **Application-Specific Integrated Curcuit (ASIC)**.
- The phone can be configured as an 802.1Q trunk or an access link.
- The human ear will accept ~140-150milliseconds of delay before it notices a problem.
- We have four options to set these up:
  1. Use Acces Link.
  2. Use a trunk with 802.1p
  3. Use a trunk without tagging voice traffic.
  4. Use a trunk with a specific Voice VLan ID.
- PortFast is auto enabled for Voice VLANS.



# The VLAN Trunking Protocol

# Spanning Tree Protocol Fundamentals
- In this field, we like *Redundancy*.
- A single point of failure is not acceptable.
- It doesn't work the same at Layer 2 vs Layer 3.
- AT L3, we're allowed to set Secondary paths in addition to primary paths.
- While they exist at L2, they will not be used in addition to the primary path.
- The purpose of **Spanning Tree Protocol** is to:
  1. find the best loop-free paths
  2. Block on the others to hold in standby.
- Once this is found, it will begin unblocking the other ports and paths.
- A Broadcast Storm does not happen all at once; it slowly builds up.
- The **Bridge Protocol Data Unit (BPDU)** mac is 01:08:c2:00:00:00.
- The **Configuration BPDUs** are what are used to STP calculations.
- The root bridge is what sets the STP timers.
- The **Bridge ID Priority (BID)** is a combination of the priority value and the switch's mac.
- It will come as <pri-value>:<mac> as the format.
- The Root Bridge will be the device with the lowest BID.
- Config BPDUs go out every 2 seconds.
- Each port has a **Path Cost** which is saved locally but not broadcast.
- The **Root Path Cost** is a cumulative value which is incremented at each switch.
- Remember that _this value is incremented when it is received and not when it is sent_.
- The logic to select the Root Port:
  1. First its the lowest bid.
  2. Next with the lowest root path cost.
  3. Next port with the lowest sender BID.
  4. Next lowest port which received the BID.
  5. Lastly, the lowest port it was sent from.
- The shortest path is not always the shortest path - due to speed.
- The difference between **Disabled** and **Blocked** on ports is that blocked accepts BPDUs.
- The port mode **Listening** is listening for *BPDUs* and send them as well.
- The port mode **Learning** still is not forwarding frames but can learn MAC Addresses.
- STP Timers are important for the test - and you should know them - but you should be cautious about changing them manually.
- The **Hello Time** defines how often the root bridge will originate Config BPDUs: default 2s.
- The **Forwarding Delay** is the length of the listening and learning STP stages: default 15s.
- The **Maximum Age** is how long the switch will retain the superiors BPDUs contents before discarding: 20s.


# Advanced STP Features


# RSTP & MST
- RSTP Stands for **Rapid Spanning Tree Protocol**.
- It is defined in IEEE 802.1w and is considered an extension of 802.1d.
- The 30 second delay in STP via listening and learning was once considered acceptable; not anymore for some networks.
- *RSTP* -like STP - will not have **Root Ports** but rather **Designated Ports**.
- It does however have **Alternate Ports** instead of blocking ports.
- This will become the **Backup Port** for the segment - with no guarantee that the root switch will be reachable.
- RSTP merges the states *disabled*, *blocking* and *listening* into a single state called **discarding**.
- There are also two new port types:
  1. **Edge Ports**: A port on the edge of the network; such as a end user's PC.
    * This is a port configured for PortFast: goes straight from discarding to forwarding.
    * If a BPDU comes in on an edge port, then it generates a **Togology Change Network BPDU**.
  2. **Point-to-Point Ports**: Any connecting running Full Duplex Mode.
- You **cannot** run RSTP over a Halfduplex system.
- RSTP does not consider an edge port moving into forwarding mode a Topology change.
- RSTP also generates BPDUs every 2 seconds regardless of whether they got a BPDU or not.
- Every switch expects to receive a BPDU from its neighbor so if it misses 3 of them it assumes that the link is down.
- **RSTP Syncronization** is a simple series of handshakes between switches carried out until all switches in the network are synchronized.
- Does RSTP play well with STP? Mostly, yes.
- You can tell switches how to handle BPDUs by setting the version number in it.
  * Version 2 is RSTP
  * Version 0 is STP
- If you see the line `Spanning tree enabled protocol ieee` then you're running STP.
- The other for RSTP is `Spanning tree enabled protocol rstp`.
- It also shows up as type.
- PVST stands for **Per-VlAN Spanning Tree** which a PVST+ proprietary to cisco.
- This allows for fine tuning STP for each VLAN traffic.
- Running will use more CPU load and RAM.
- The PVST version must be running ISL Trunking.
- It also doesn't play well with **Common Spanning Tree**.
- **Multiple Spanning Tree** is defined in 802.1s and earns its name from allowing multiple VLANs to be mapped to a single instance of STP instead of per VLAN.
- What it does is logically divides the Switches into regions and the switches in any given region must agree on:
  1. MST config name.
  2. MST revision Number.
  3. MST VLAN mapping table.
- CST is a mapping of the whole network while MST is subsets of the network.
- IST stands for **Internal Spanning Tree** and is the instance that is responsible for keeping communication in the MST regions loop free.
- All instances in IST are mapped to Instance 0 unless the Network Admin changes them to something else.



# VPNs and IPSec
- VPN stands for **Virtual Private Network**.
- We also refer to them as **Tunnels**.
- **Data Origin Authentication** ensures that the VPN knows the real source of the packet.
- GRE stands for **Generic Routing Encapsulation**.
- **IPSec** offers encryption and Authentication.
- It is comprised of three pieces:
  1. **Authentication Header (AH)**: Methods for Authenticating and Securing Data.
    * Data Origin Authentication.
    * Data Integrity.
    * Optional Replay Protection
  2. **Eccapusluting Security Payload (ESP)**: defines a method for authenticating, security and encrypting data.
    * Data Origin Authentication.
    * Anti-replay Protection.
    * Data Confidentiality.
  3. **Internet Key Exchange (IKE)**: which negotiates the security parameters and authentication keys.
- In **Tunnel Mode**, the entire process is transparent to the end hosts and everything gets encapsulated.
- In **Transport Mode**, the payload is encrypted but the IP Header is not.
- Process:
  1. Process Initialization: receive interesting traffic
  2. IKE Phase 1.
  3. IKE Phase 2
  4. ?
  5. ?
- One thing about configuring VPNs at Layer 2 is that you cannot test anything until after everything is configured and running.
- For the connection to go ahead, the negotiated Encryption values must match but the lifetime of the recipient may be equal to or less than.
- **IPSec Transform Sets** is simply a group of individual parameters that will enforce a security policy.
- Crypto ACL will evaluate inbound and outbound traffic.
- The same ACL is going to be read for both inbound and outbound traffic.
- It is read forwards for inbound traffic and backwards for outbound traffic.
- DMVPN stands for **Dynamic Multipoint VPNs**.
- It allows a spoke router to dynamically create a VPN to another spoke when the VPN is actually needed and then tear that same VPN down when it's not needed anymore.
- NHRP stands for **Next Hop Routing Protocol**.
- If you see tunnels bouncing then it means the router can only reach the other router intermittently.
- If you're troubleshooting then start with connectivity > mGRE > IPSec.
- IPSec has one glaring weakness which is the inability to protect multicast packets.
- mGRE makes it possible for the hub to use one interface for as many tunnels as you need.
- Don't block IP protocol 47 since that is GRE.
- If you set the IP addresses on **Virtual Routing and Forwarding (VRF)** interfaces and then setup VRF then it will strip them and you will need to add them back.
- VRF keeps a separate routing table for each instance.




# More to Come

# Reference:

# Research:
- dot1q?
- dot1p?
