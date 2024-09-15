## Bates Motel Web CTF

**Bates Motel** is a beginner-level web Capture The Flag (CTF) challenge provided by the CyberDawgs, distributed as a Docker container for easy setup.

### Challenge Objective

The objective of Bates Motel is to discover and exploit vulnerabilities on the website. Note that you should not refer to the source files provided in the GitHub repository; the challenge is to find and exploit vulnerabilities purely through interaction with the website.

### Installation Steps

1. **Install Docker Engine**
   - Follow the installation guide for Docker Engine at [Docker Installation Guide](https://docs.docker.com/engine/install/).

2. **Download Bates Motel**
   - Clone the Bates Motel repository from GitHub using the following command:
     ```bash
     git clone https://github.com/UMBCCyberDawgs/Batesmotel.git
     ```

3. **Navigate to the Bates Motel Directory**
   - Navigate to the top-level directory of Bates Motel:
     ```bash
     cd Batesmotel
     ```

4. **Build the Docker Container**
   - Run the following command to build the Docker container:
     ```bash
     sudo ./ctf.sh build
     ```

5. **Start the Docker Container**
   - Run the following command to start the Docker container:
     ```bash
     sudo ./ctf.sh run
     ```

6. **Setup the Environment**
   - Configure the environment with the following command:
     ```bash
     sudo ./ctf.sh setup
     ```

7. **Access Bates Motel**
   - Open your web browser and go to [http://127.0.0.1:8000/login.php](http://127.0.0.1:8000/login.php) to access Bates Motel and begin the Challenge.

### Additional Commands

For convenience, the `ctf.sh` script includes two useful additional commands:

- **Stop and Remove the Container**
  - To stop and remove the Bates Motel container, use:
    ```bash
    sudo ./ctf.sh rm
    ```

- **Enter the Container's Bash Terminal**
  - To access a bash terminal inside the Bates Motel container, use:
    ```bash
    sudo ./ctf.sh enter
    ```
