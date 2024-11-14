# KUID PHP

Based on the article by Sonu Kumar [KUID](https://dev.to/sonus21/kuid-compressed-universally-unique-identifier-384i).

It is a smaller encoded UUID. There are thre flavors, KUID32, KUID36 and KUID62. The KUID36 uses base 36 to encode and the KUID62 uses base 62 to encode the UUID.

Example of KUID strings: 

```
9b4d0c5f-85e4-4aa0-afd4-b14ee901a246 // UUID
E3JUGF7BPEJKQK7VFRJ3UQDISG           // KUID32
96ZOA5NS2NCE414W6BD2A7Q6E            // KUID36
4j31M44YnkT8uMi9FPlbsc               // KUID62
```