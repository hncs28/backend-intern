<template>
    <div class="menu" style="margin-top: 30px">
        <HeaderMenu/>
    </div>
    <div class="image2">
        <img src="@/assets/image.jpg">
        <div class="text">ĐỘI NGŨ Y BÁC SĨ</div>
    </div>


    <div class="doctor-list">
        <div v-for="employee in employees" :key="employee.employeeID" class="doctor-item">
            <img :src="employee.employeeImage" alt="Employee Image" />
            <p>{{ employee.employeeRole }}</p>
            <h3>{{ employee.employeeName }} </h3>
        </div>
    </div>


    <div class="footer-container">
        <div class="footer-left">
            <div class="footer-logo">
                <a href="http://localhost:8081/">
                    <img src="@/assets/logo.png">
                </a>
            </div>
            <div class="footer-item">
                <a href="https://www.facebook.com/pkmatNgoiSao">
                    <img src="@/assets/facebook.png">
                </a>
                <a href="https://www.youtube.com/@PhongkhamMatNgoiSao">
                    <img src="@/assets/youtube.png">
                </a>
                <a href="https://zalo.me/1118479193975234403">
                    <img src="@/assets/zalo.png">
                </a>
            </div>
        </div>
        <div class="footer-right">
            <p style="font-size:22px ;color: #54595f; font-weight: bold;">Thông Tin Liên Hệ</p>
            <p style="font-weight: bold; color: #61ce70;">_____</p> <br>
            <div class="diachi" style="display: flex;">
                <img src="@/assets/dia_chi.png" style="margin-right: 20px;">
                <p>Số nhà 22 liền kề 6A C17 bộ công an, làng Việt Kiều Châu Âu, Mộ Lao, Hà Đông, Hà Nội</p>
            </div><br>
            <div class="phone" style="display: flex;">
                <img src="@/assets/phone.png" style="margin-right: 20px;">
                <p>098 7654 321</p>
            </div><br>
            <div class="www" style="display: flex;">
                <img src="@/assets/www.png" style="margin-right: 20px;">
                <p>http://localhost:8081/</p>
            </div><br>
            <div class="time" style="display: flex;">
                <img src="@/assets/time.png" style="margin-right: 20px;">
                <p>Time: 8.00 - 19.00h hàng ngày (Kể cả thứ 7 và Chủ nhật)</p>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import HeaderMenu from './HeaderMenu.vue';

export default {
    name: 'DoctorTeam',
    components: {
        HeaderMenu,

    },
  data() {
    return {
      employees: []
    };
  },
  created() {
    console.log('222')
    this.fetchEmployees();
  },
  methods: {
    async fetchEmployees() {
      try {
        const response = await axios.get('/api/employees');
        this.employees = response.data;
      } catch (error) {
        console.error('Error fetching employees:', error);
      }
    }
  }
};

</script>
<style>
.image2 {
    position: relative;
    display: inline-block;
    padding-top: 30px;
}

.image2 img {
    display: block;
    width: 100%;
    height: auto;
}

.image2::before {
    content: "";
    position: absolute;
    top: 20px;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.5);
    pointer-events: none;
}

.image2 .text {
    position: absolute;
    top: 60%;
    left: 20%;
    transform: translate(-50%, -50%);
    color: black;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 30px;
    font-weight: bold;
}


/*------------------------Danh Sách Bác Sĩ--------------------------*/
.doctor-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding-top: 100px;
    margin-left: 90px;
    margin-right: 90px;
}

.doctor-item {
    flex: 1 1 calc(33.333333% - 20px);
    /* Chia đều 3 cột với khoảng cách 20px */
    box-sizing: border-box;
    padding-bottom: 70px;
    text-align: center;
}

.doctor-item img {
    border-radius: 10px;
    max-width: 350px;
    height: 360px;
    transition: 0.3s;
}

.doctor-item img:hover {
    transform: translateY(-10px);
}

.doctor-item h3 {
    margin: 10px 0;
    color: #42464e;
    font-size: 20px;
    transition: 0.3s;
}

.doctor-item h3:hover {
    color: #85cb6c;
}

.doctor-item p {
    margin-top: 30px;
    color: #85cb6c;
}



/*------------------------Footer--------------------------*/
.footer-container {
    display: flex;
    margin-top: 50px;
    height: 400px;
    background-color: #f6f7fa;
}

.footer-left {
    margin-left: 80px;
    margin-top: 100px;
    flex: 2;
}

.footer-right {
    padding-top: 15px;
    margin-top: 100px;
    margin-right: 80px;
    flex: 1;
}

.footer-logo img {
    margin-left: 35px;
    padding-bottom: 30px;
    flex: 0;
    width: 100px;
    height: auto;
}

.footer-item img {
    margin-left: 15px;
    width: 35px;
    height: 35px;
}


.footer-right p {
    justify-content: flex-start;
    text-align: left;
    font-family: "Montserrat", Arial, Helvetica, sans-serif;
    color: #54595f;
}

.footer-right img {
    width: 15px;
    height: 20px
}
</style>